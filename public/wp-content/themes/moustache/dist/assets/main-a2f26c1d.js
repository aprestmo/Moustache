const d=document.querySelector("#js-menu-toggle--open"),m=document.querySelector("#js-menu-toggle--close"),r=document.querySelector("#js-site-navigation");d.addEventListener("click",()=>{r.classList.toggle("is-visible")});m.addEventListener("click",()=>{r.classList.toggle("is-visible")});function p(){const t=$(".js-search-toggle"),s=document.querySelector("#js-search-overlay"),i=document.querySelector("#js-search-field");t.on("click",()=>{s.classList.toggle("is-visible"),i.focus()})}p();(function(t){function s(e){var n=e.find(".marker"),o={zoom:e.data("zoom")||16,mapTypeId:google.maps.MapTypeId.ROADMAP},a=new google.maps.Map(e[0],o);return a.markers=[],n.each(function(){i(t(this),a)}),l(a),a}function i(e,n){var o=e.data("lat"),a=e.data("lng"),g={lat:parseFloat(o),lng:parseFloat(a)},c=new google.maps.Marker({position:g,map:n});if(n.markers.push(c),e.html()){var u=new google.maps.InfoWindow({content:e.html()});google.maps.event.addListener(c,"click",function(){u.open(n,c)})}}function l(e){var n=new google.maps.LatLngBounds;e.markers.forEach(function(o){n.extend({lat:o.position.lat(),lng:o.position.lng()})}),e.markers.length==1?e.setCenter(n.getCenter()):e.fitBounds(n)}t(document).ready(function(){t(".acf-map").each(function(){s(t(this))})})})(jQuery);menu();search();
