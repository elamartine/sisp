let map = null;
let centerLatLng = { lat: -5.7878187, lng: -35.1996854 };
let apiKey = "AIzaSyDrrB9We9tVcHsIjQmiEC0sIyMCIgxVtz0";

let inputLatEl = document.querySelector("#lat");
let inputLngEl = document.querySelector("#lng");
let alertLocationEl = document.querySelector("#alert-location");
let submitBtnEl = document.querySelector("#submit-btn");

let isDisabled = true;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: centerLatLng,
    zoom: 12,
    disableDefaultUI: true,
    styles: [
      {
        featureType: "all",
        elementType: "labels",
        stylers: [
          {
            visibility: "off",
          },
        ],
      },
      {
        featureType: "poi.park",
        elementType: "geometry.fill",
        stylers: [
          {
            color: "#aadd55",
          },
        ],
      },
      {
        featureType: "road.highway",
        elementType: "labels",
        stylers: [
          {
            visibility: "on",
          },
        ],
      },
      {
        featureType: "road.arterial",
        elementType: "labels.text",
        stylers: [
          {
            visibility: "on",
          },
        ],
      },
      {
        featureType: "road.local",
        elementType: "labels.text",
        stylers: [
          {
            visibility: "on",
          },
        ],
      },
      {
        featureType: "water",
        elementType: "geometry.fill",
        stylers: [
          {
            color: "#517ea6",
          },
        ],
      },
    ],
  });

  let infoWindow = new google.maps.InfoWindow({
    content: "Clique para selecionar uma posição!",
    position: centerLatLng,
  });
  infoWindow.open(map);

  let marker = null;

  map.addListener("click", async (mapsMouseEvent) => {
    if (isDisabled) {
      alertLocationEl.remove();
      submitBtnEl.disabled = false;
      isDisabled = false;
    }

    infoWindow.close();

    if (marker) marker.setMap(null);

    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    marker = new google.maps.Marker({
      position: mapsMouseEvent.latLng,
    });

    inputLatEl.value = mapsMouseEvent.latLng.lat();
    inputLngEl.value = mapsMouseEvent.latLng.lng();

    const response = await fetch(
      `https://maps.googleapis.com/maps/api/geocode/json?latlng=${mapsMouseEvent.latLng.lat()},${mapsMouseEvent.latLng.lng()}&key=${apiKey}`
    );
    const data = await response.json();

    infoWindow.setContent(data.results[0].formatted_address);
    infoWindow.open(map);
    marker.setTitle(data.results[0].formatted_address);
    marker.setMap(map);
  });
}
