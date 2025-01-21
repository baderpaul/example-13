const filters = document.querySelectorAll(".filter");
const project = document.querySelectorAll(".project");

const filterItems = (filter) => {
  project.forEach((item) => {
    if (
      filter === "all" ||
      item.getAttribute("data-category").includes(filter)
    ) {
      item.classList.remove("hide");
    } else {
      item.classList.add("hide");
    }
  });
};

filters.forEach((filter) => {
  filter.addEventListener("click", () => {
    const filteritem = filter.getAttribute("data-filter");
    filterItems(filteritem);
  });
});
