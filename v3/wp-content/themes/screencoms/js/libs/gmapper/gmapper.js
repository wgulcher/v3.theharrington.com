/* 
	GMapper by Justin Perry @ Billington Cartmell
	v0.2 
	@NOTE	- Use of custom_infobox option currently uses Handlebars for templating

	@TODO	- To abstract the marker onclick event to separate method
			- Build a next/previous location API
			- Specify which meta data to attach to point - currently attaches locations object to each point
			- Include basic documentation
			- Allow user-definable initial lat/lon if random is set to false
			- Set onclick zoomto level
*/
var GMapper = GMapper || {};  

(function(){
	GMapper = function(options) {
		if(!options.container){
			throw new Error("No map container specified");
		}
		this.container = document.getElementById(options.container);
		this.curr_marker = null;
		this.cluster = options.cluster || false;
		this.custom_infobox = options.custom_infobox || false;
		this.select_callback = options.select_callback || function() {};
		this.unselect_callback = options.unselect_callback || function() {};
		this.locations = options.locations || false;
		this.marker_options = options.marker_options || false;
		this.map_options = options.map_options || {	mapTypeId: google.maps.MapTypeId.SATELLITE, zoom: 3 };
		this.pan_by = options.pan_by || [0 ,0];
		this.random_location = options.random_location || false;
		this.selected_location = null,
		this.center_lat = options.center.lat || false,
		this.center_lon = options.center.lon || false,
		this.ib = false;
	};
	GMapper.prototype = {
		init: function() {
			this.hash = this.get_hash(location.href);
			this.build_map();
		},
		build_map: function() {
			var location,
				that = this,
				selected_location,
				markers = [],
				marker_icon,
				map = new google.maps.Map(this.container, this.map_options),
				map_cluster,
				center,
				ib;
			
			if(this.random_location){
				if(!this.selected_location){
					this.selected_location = this.locations[parseInt(Math.random() * this.locations.length, 10)];
				}
			}
			else {
				this.selected_location = this.locations[0];
			}
			
			if(this.marker_options.enabled){
				marker_icon = new google.maps.MarkerImage(this.marker_options.icon, new google.maps.Size(this.marker_options.size[0], this.marker_options.size[1]));
			}

			for(var i = 0; i < this.locations.length;i++){
				location = this.locations[i];
				if(typeof this.hash !== "undefined"){
					if(location.slug === this.hash){
						this.selected_location = location;
					}
				}
				markers.push(this.add_marker(map, location, marker_icon));
			}					
	
			if(this.cluster.enabled){
				if(typeof MarkerClusterer === "function"){
					map_cluster = new MarkerClusterer(map, markers, {
						gridSize: 50, 
						maxZoom: 15,
						styles: that.cluster.styles[0]
					});				
				}
				else {
					throw new Error("MarkerClusterer library not found");
				}
			}

			if(this.custom_infobox.enabled){
				if(typeof InfoBox === "function"){
					this.ib = new InfoBox({
						pixelOffset: new google.maps.Size(this.custom_infobox.offset_x, this.custom_infobox.offset_y),
						closeBoxURL: '',
						alignBottom: true
					});
				} else {
					throw new Error("InfoBox library not found");
				}
			}

			if (this.center_lat && this.center_lon) {
				map.setCenter(new google.maps.LatLng(this.center_lat, this.center_lon));
			} else {
				map.setCenter(new google.maps.LatLng(this.selected_location.lat, this.selected_location.lon));
			}
			map.panBy.apply(map, this.pan_by);
			
			this.select_callback(this.selected_location);
		},				
		add_marker: function(map, location, marker_icon) {
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(location.lat, location.lon),
				map: map,
				title: location.title,
				icon: marker_icon,
				id: location.id
			}),
			that = this;			
			marker.meta = location;
			
			if(location.id === this.selected_location.id){
				this.change_marker_icon(marker, this.marker_options.icon_active);
			}
			this.add_marker_bindings(map, marker);
			return marker;
		},
		add_marker_bindings: function(map, marker) {
			var that = this;
			
			google.maps.event.addListener(marker, "click", function () {
				// that.select_callback(this.meta);
				map.panTo(new google.maps.LatLng(this.meta.lat, this.meta.lon));
				map.panBy.apply(map, that.pan_by);
				// that.change_marker_icon(marker, that.marker_options.icon_active);
				// that.selected_location = this.meta;
				that.select_callback(this.meta.id);
				that.makeInfoWindow(map, this);
			});
			google.maps.event.addListener(marker, "mouseover", function () {
				that.hover_icon(marker, that.marker_options.icon_active);
			});
			google.maps.event.addListener(marker, "mouseout", function () {
				if(this.id !== that.selected_location.id){
					that.hover_icon(marker, that.marker_options.icon);
				}
			});
			google.maps.event.addListener(map, 'click', function(){
				if(that.custom_infobox.enabled){
					that.ib.close();
				}
				that.unselect_callback();
			});
		},
		hover_icon: function(marker, marker_icon) {
			marker.setIcon(marker_icon);
		},
		change_marker_icon: function(marker, marker_icon) {
			if(this.curr_marker !== null){
				this.curr_marker.setIcon(this.marker_options.icon);
			}
			this.curr_marker = marker;
			marker.setIcon(marker_icon);
		},
		get_hash: function(url) {
			url = url.match(/#(.[A-Z1-9\-_]*)/ig);
			return (url !== null)? url.toString().replace("#", "") : "";
		},
		makeInfoWindow: function(map, marker) {
			var meta = marker.meta;
			var source   = jQuery("#map-infobox-template").html();
			var template = Handlebars.compile(source);
			var html     = template(meta);
			this.ib.setContent(html);
			this.ib.open(map, marker);
			//google.maps.InfoWindow();
		}
	};
})(GMapper);  