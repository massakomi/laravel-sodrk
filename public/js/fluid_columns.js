(function( $ ){
	var plugin_name = 'fluid_columns', 
	methods = {
		init : function(options) {
			options = $.extend({width: 'auto'}, options);
			
			return this.each(function() {
				var $this = $(this), data = $this.data(plugin_name);
				
				if (!data) {
					var v = {
							elements: $this.children('li'),
							heights: {},
							width: (options.width == 'auto' ? $this.children('li').first().outerWidth(true) : options.width),
							resizeTimeout: 0
						}, height, total = 0;
					
					$.map(v.elements, function(e, key) { 
						height = $(e).outerHeight(true);
						total += height;
						v.heights[key] = height;
					});
					
					v.total = total;
					
					$this.data(plugin_name, v);
					
//					$(window).resize(function() {
//						$this.fluid_columns('draw', true);
//					});
				}
				
				$this.fluid_columns('draw');
			});
		},
		draw : function(by_timer) {
			if (by_timer) {
				return this.each(function() {
					var $this = $(this),
					data = $this.data(plugin_name);
					
					if (data.resizeTimeout) {clearTimeout(data.resizeTimeout);}
					
					data.resizeTimeout = setTimeout(function() {$this.fluid_columns('draw');}, 300);
					
					$this.data(plugin_name, data);
				});
			}

			return this.each(function(){
				var $this = $(this),
				v = $this.data(plugin_name),
				column_count = Math.floor($this.width() / v.width);
				var max_height = Math.floor(v.total / column_count) + 1,
				column = 0, top = new Array(), breaked = false;
				
				
				for(var n = 0; n < column_count; n++) {
					top[n] = 0;
				}
				
                //var j = 0, k = column_count - 1, min = max_height;
				$.map(v.elements, function(e, i) {
                    /*_h = j * v.width;
                    if (v.heights[i] < min) {
                        min = v.heights[i];
                    }
                    if (i % column_count == k) {
                        //$(e).css({'left': column * v.width + 'px', 'top': top[column] + 'px'});
                        j = -1;
                    }
                    if (i % (k + 2) == column_count) {
                        
                    }
                    j ++;*/
					if (max_height >= (v.heights[i] + top[column])) {
						$(e).css({'left': column * v.width + 'px', 'top': top[column] + 'px'});
						top[column] += v.heights[i];
					} else {
						breaked = false;
						++column;
						while(column < column_count) {
							if (max_height >= (v.heights[i] + top[column])) {
								breaked = true;
								break;
							} else {
								++column;
							}
						}
						if (!breaked && column == column_count) {
							column = 0;
						}
						
						$(e).css({'left': column * v.width + 'px', 'top': top[column] + 'px'});
						
						top[column] += v.heights[i];
						if (max_height < top[column]) max_height = top[column];
					}
				});
				
				$this.height(max_height);
			});
		}
	};
	
	$.fn.fluid_columns = function(method) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Method ' +  method + ' does not exist');
		}
	};
})(jQuery);