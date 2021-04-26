const spotsEl = document.querySelectorAll(".spot");
const spotModalEl = document.querySelector("#spotModal");
const spotModal = new bootstrap.Modal(spotModalEl);
const approveEl = document.querySelector("#approve-spot");
const failEl = document.querySelector("#fail-spot");
let mapModal = null,
  marker = null;

window.onload = (e) => {
  mapModal = new google.maps.Map(spotModalEl.querySelector("#map-modal"), {
    center: { lat: -5.7878187, lng: -35.1996854 },
    zoom: 16,
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
  marker = new google.maps.Marker({ map: mapModal });
};

spotsEl.forEach((spotEl) => {
  spotEl.addEventListener("click", ({ target }) => {
    const value = JSON.parse(target.dataset.spot);
    const baseUrl = document.querySelector("body").dataset.home;

    spotModalEl
      .querySelector("#img-spot")
      .setAttribute(
        "src",
        `${baseUrl}/uploads/pictures/${value.path}`
      );
    spotModalEl.querySelector("#title").textContent = value.name;
    spotModalEl.querySelector("#description").textContent = value.description;

    if (approveEl && failEl) {
      approveEl.setAttribute("href", `${baseUrl}moderate/approve/${value.id}`);
      failEl.setAttribute("href", `${baseUrl}moderate/fail/${value.id}`);
    }

    mapModal.setCenter({ lat: Number(value.lat), lng: Number(value.lng) });
    marker.setPosition({ lat: Number(value.lat), lng: Number(value.lng) });
    marker.setTitle(value.name);

    spotModal.show();
  });
});
