const routePoints = [
  { label: "Point 1", lat: 52.3740, lng: 4.9090, info: "Anne Frank House" },
  { label: "Point 2", lat: 52.3731, lng: 4.8978, info: "Royal Palace Amsterdam" },
  { label: "Point 3", lat: 52.3667, lng: 4.9040, info: "Rijksmuseum" },
  { label: "Point 4", lat: 52.3600, lng: 4.9150, info: "Rembrandt House Museum" },
  { label: "Point 5", lat: 52.3663, lng: 4.9455, info: "NEMO Science Museum" },
];

let routeMap, routeMarkers = [], routeInfoWindows = [], routeActiveIdx = null;

function initRouteMap() {
  routeMap = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 52.370, lng: 4.920 },
    zoom: 13,
    mapTypeControl: false,
    streetViewControl: false,
    fullscreenControl: false,
    styles: [
      { featureType: "poi", elementType: "labels", stylers: [{ visibility: "off" }] }
    ]
  });

  const list = document.getElementById("routePointList");

  routePoints.forEach((p, i) => {
    const marker = new google.maps.Marker({
      position: { lat: p.lat, lng: p.lng },
      map: routeMap,
      label: { text: String(i + 1), color: "#fff", fontWeight: "bold", fontSize: "13px" },
      title: p.label,
    });

    const iw = new google.maps.InfoWindow({
      content: `<div style="font-family:sans-serif;font-size:13px;padding:2px 4px">${p.info}</div>`
    });

    routeInfoWindows.push(iw);
    routeMarkers.push(marker);
    marker.addListener("click", () => activateRoutePoint(i));

    const row = document.createElement("div");
    row.className = "route__point";
    row.dataset.idx = i;
    row.innerHTML = `
      <svg class="route__point-icon" viewBox="0 0 24 24" fill="none">
        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="#e58345" stroke-width="1.5"/>
        <circle cx="12" cy="9" r="2.5" stroke="#e58345" stroke-width="1.5"/>
      </svg>
      <span class="route__point-label">${p.label}</span>
    `;
    row.addEventListener("click", () => activateRoutePoint(i));
    list.appendChild(row);
  });
}

function activateRoutePoint(i) {
  routeInfoWindows.forEach(iw => iw.close());
  document.querySelectorAll(".route__point").forEach(el => el.classList.remove("active"));

  if (routeActiveIdx === i) {
    routeActiveIdx = null;
    return;
  }

  routeActiveIdx = i;
  routeInfoWindows[i].open(routeMap, routeMarkers[i]);
  routeMap.panTo({ lat: routePoints[i].lat, lng: routePoints[i].lng });
  document.querySelector(`.route__point[data-idx="${i}"]`).classList.add("active");
}