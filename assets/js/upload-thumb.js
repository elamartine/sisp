const thumbEl = document.querySelector("#thumb");
thumbEl.addEventListener("input", ({ target }) => {
  let { value: arcPath } = target;

  arcPath = arcPath.split("\\");
  arcPath = arcPath[arcPath.length - 1];

  const newName = arcPath.slice(0, arcPath.lastIndexOf("."));
  document.querySelector(
    "#title-img-upload"
  ).textContent = `Imagem carregada: ${newName}`;
});
