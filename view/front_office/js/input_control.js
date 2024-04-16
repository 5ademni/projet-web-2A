document
  .querySelector(".create-form")
  .addEventListener("submit", function (event) {
    const titlePattern = /^[a-zA-Z0-9\s]{1,30}$/;
    const locationPattern = /^[a-zA-Z0-9\s]{1,30}$/;
    const salaryPattern = /^[0-9,]+(\$|TND)$/;
    const descriptionPattern =
      /^[a-zA-Z0-9\s,;:!?@#$%&*()-+=\[\]{}|<>.\'\"]{1,1000}$/;

    var titleInput = document.querySelector("#job-titleT");
    var locationInput = document.querySelector("#job-locationT");
    var salaryInput = document.querySelector("#job-salaryT");
    var descriptionInput = document.querySelector("#descriptionT");

    if (!titlePattern.test(titleInput.value)) {
      event.preventDefault();
      alert(
        "Invalid title. Please make sure your title is 1-30 characters long and does not contain any special characters."
      );
    }

    if (!locationPattern.test(locationInput.value)) {
      event.preventDefault();
      alert(
        "Invalid location. Please make sure your location is 1-30 characters long and does not contain any special characters."
      );
    }

    if (!salaryPattern.test(salaryInput.value)) {
      event.preventDefault();
      alert(
        "Invalid salary. Please make sure your salary is in the correct format (numbers followed by $ or TND)."
      );
    }

    if (!descriptionPattern.test(descriptionInput.value)) {
      event.preventDefault();
      alert(
        "Invalid description. Please make sure your description is 1-1000 characters long and does not contain any backslashes or forward slashes."
      );
    }
  });
