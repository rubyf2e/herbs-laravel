<?php

namespace App\Admin\Extensions\Column;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Displayers\AbstractDisplayer;

class OpenMap extends AbstractDisplayer
{
    public function display(\Closure $callback = null, $btn = '')
    {
        $callback = $callback->bindTo($this->row);
        $target   = call_user_func($callback);
        $id       = $target['id'];
        $position = $target['position'];
        $key      = $this->getKey();
        $name     = $this->column->getName();
        Admin::script($this->script());

        return <<<EOT
<button class="btn btn-xs btn-default grid-open-map" data-id
="{$id}" data-key="{$key}" data-lat="{$position['lat']}" data-lng="{$position['lng']}" data-toggle="modal" data-target="#grid-modal-{$name}-{$key}">
    <i class="fa fa-map-marker"></i> $btn
</button>

<div class="modal" id="grid-modal-{$name}-{$key}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">$btn</h4>
      </div>
      <div class="modal-body">
        <div id="grid-map-{$key}" style="height:450px;"></div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
EOT;
    }

    protected function script()
    {

        $url = url('admin/map/updatePosition');
        return <<<EOT

        $('.grid-open-map').on('click', function() {
        var target = $(this);
        var key    = target.data('key');
        var id     = target.data('id');
        var lat    = target.data('lat');
        var lng    = target.data('lng');

         function initGoogleMap(name) {

            var LatLng = new google.maps.LatLng(lat, lng);
            var options = {
                zoom: 4,
                center: LatLng,
                panControl: false,
                zoomControl: true,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }

            var container = document.getElementById("grid-map-"+key);
            var map       = new google.maps.Map(container, options);

            var marker = new google.maps.Marker({
                position: LatLng,
                map: map,
                title: 'Drag Me!',
                draggable: true
                });

                google.maps.event.addListener(marker, 'dragend', function (event) {
                  var data = {
                  "id" : id,
                  "lat": event.latLng.lat(),
                  "lng": event.latLng.lng()
                  };
                    $.ajax({
                      url: "{$url}",
                      method:"POST",
                      data: data
                      }).done(function() {
                        target.data('lat', event.latLng.lat());
                        target.data('lng', event.latLng.lng());
                      });
                    });
                }

                initGoogleMap();
                });


EOT;
    }
}
