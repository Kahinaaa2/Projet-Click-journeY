function applyStoredTheme() {
  const storedTheme = localStorage.getItem("theme");
  if (storedTheme === "sombre") {
    const elementsToToggle = [
      document.body,
    ];

    elementsToToggle.forEach((el) => {
      if (el && !el.classList.contains("sombre")) {
        el.classList.add("sombre");
      }
    });
  }
}

function toggleTheme() {
  const elementsToToggle = [
    document.body,
  ];

  elementsToToggle.forEach((el) => {
    if (el) el.classList.toggle("sombre");
  });

  const newTheme = document.body.classList.contains("sombre") ? "sombre" : "clair";
  localStorage.setItem("theme", newTheme);
}

document.addEventListener("DOMContentLoaded", applyStoredTheme);
