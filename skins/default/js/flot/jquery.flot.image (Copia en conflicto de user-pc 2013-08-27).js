/* Flot plugin for plotting images.

Copyright (c) 2007-2013 IOLA and Ole Laursen.
Licensed under the MIT license.

The data syntax is [ [ image, x1, y1, x2, y2 ], ... ] where (x1, y1) and
(x2, y2) are where you intend the two opposite corners of the image to end up
in the plot. Image must be a fully loaded Javascript image (you can make one
with new Image()). If the image is not complete, it's skipped when plotting.

There are two helpers included for retrieving images. The easiest work the way
that you put in URLs instead of images in the data, like this:

	[ "myimage.png", 0, 0, 10, 10 ]

Then call $.plot.image.loadData( data, options, callback ) where data and
options are the same as you pass in to $.plot. This loads the images, replaces
the URLs in the data with the corresponding images and calls "callback" when
all images are loaded (or failed loading). In the callback, you can then call
$.plot with the data set. See the included example.

A more low-level helper, $.plot.image.load(urls, callback) is also included.
Given a list of URLs, it calls callback with an object mapping from URL to
Image object when all images are loaded or have failed loading.

The plugin supports these options:

	series: {
		images: {
			show: boolean
			anchor: "corner" or "center"
			alpha: [ 0, 1 ]
		}
	}

They can be specified for a specific series:

	$.plot( $("#placeholder"), [{
		data: [ ... ],
		images: { ... }
	])

Note that because the data format is different from usual data points, you
can't use images with anything else in a specific data series.

Setting "anchor" to "center" causes the pixels in the image to be anchored at
the corner pixel centers inside of at the pixel corners, effectively letting
half a pixel stick out to each side in the plot.

A possible future direction could be support for tiling for large images (like
Google Maps).

*/

(function ($) {
    var options = {
        series: {
            images: {
                show: false,
                alpha: 1,
                anchor: "corner" // or "center"
            }
        }
    };

    $.plot.image = {};

    $.plot.image.loadDataImages = function (series, options, callback) {
        var urls = [], points = [];

        var defaultShow = options.series.images.show;
        
        $.each(series, function (i, s) {
            if (!(defaultShow || s.images.show))
                return;
            
            if (s.data)
                s = s.data;

            $.each(s, function (i, p) {
                if (typeof p[0] == "string") {
                    urls.push(p[0]);
                    points.push(p);
                }
            });
        });

        $.plot.image.load(urls, function (loadedImages) {
            $.each(points, function (i, p) {
                var url = p[0];
                if (loadedImages[url])
                    p[0] = loadedImages[url];
            });

            callback();
        });
    }
    
    $.plot.image.load = function (urls, callback) {
        var missing = urls.length, loaded = {};
        if (missing == 0)
            callback({});

        $.each(urls, function (i, url) {
            var handler = function () {
                --missing;
                
                loaded[url] = this;
                
                if (missing == 0)
                    callback(loaded);
            };

            $('<img />').load(handler).error(handler).attr('src', url);
        });
    };
    
    function drawSeries(plot, ctx, series) {
        var plotOffset = plot.getPlotOffset();
        
        if (!series.images || !series.images.show)
            return;
        
        var points = series.datapoints.points,
            ps = series.datapoints.pointsize;
        
        for (var i = 0; i < points.length; i += ps) {
            var img = points[i],
                x1 = points[i + 1], y1 = points[i + 2],
                x2 = points[i + 3], y2 = points[i + 4],
                xaxis = series.xaxis, yaxis = series.yaxis,
                tmp;

            // actually we should check img.complete, but it
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      