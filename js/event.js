// Данные точек передаются из PHP через window.routePointsData
// Фоллбэк на пустой массив если данных нет
const routePoints = window.routePointsData || [];

let routeMap, routeMarkers = [], routeInfoWindows = [], routeActiveIdx = null;

function initRouteMap() {
  if (!routePoints.length) return;

  const center = { lat: routePoints[0].lat, lng: routePoints[0].lng };

  routeMap = new google.maps.Map(document.getElementById("map"), {
    center,
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
      content: `<div style="font-family:sans-serif;font-size:13px;padding:2px 4px">${p.label}</div>`
    });

    routeInfoWindows.push(iw);
    routeMarkers.push(marker);
    marker.addListener("click", () => activateRoutePoint(i));

    const row = document.createElement("div");
    row.className = "route__point";
    row.dataset.idx = i;

    const descHtml = p.desc
      ? `<div class="route__point-desc">${p.desc}</div>`
      : '';

    row.innerHTML = `
      <div class="route__point-header">
        <svg class="route__point-icon" viewBox="0 0 24 24" fill="none">
          <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" stroke="#e58345" stroke-width="1.5"/>
          <circle cx="12" cy="9" r="2.5" stroke="#e58345" stroke-width="1.5"/>
        </svg>
        <span class="route__point-label">${p.label}</span>
      </div>
      ${descHtml}
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
