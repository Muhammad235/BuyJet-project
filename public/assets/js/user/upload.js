
//File Upload
const dropArea = document.querySelector(".drop-section");
const listSection = document.querySelector(".list-section");
const listContainer = document.querySelector(".list");
const fileSelector = document.querySelector(".file-selector");
const fileSelectorInput = document.querySelector(".file-selector-input");

// upload file with browse button
fileSelector.onclick = () => fileSelectorInput.click();
fileSelectorInput.onchange = () => {
  [...fileSelectorInput.files].forEach((file) => {
    if (typeValidation(file.type)) {
    //   uploadFile(file);
    var fileInput = document.getElementById('selectedimage');
    var selectedFile = fileInput.files[0];

    // Get the img element
    var imgElement = document.getElementById('selected-img');
    imgElement.style.display = "block";

    // Create a FileReader to read the selected file
    var reader = new FileReader();

    // Define a function to run when the FileReader has successfully loaded the image
    reader.onload = function(e) {
        // Set the src attribute of the img element to the data URL of the selected image
        imgElement.src = e.target.result;
        imgElement.style.width = "600px";
    };

    // Read the selected file as a data URL (this will trigger the onload function)
    reader.readAsDataURL(selectedFile);
    }
  });
};

//when file is over the drag area
dropArea.ondragover = (e) => {
  e.preventDefault();
  [...e.dataTransfer.items].forEach((item) => {
    if (typeValidation(item.type)) {
      dropArea.classList.add("drag-over-effect");
    }
  });
};

//when file leaves the drag area
dropArea.ondragleave = (e) => {
  dropArea.classList.remove("drag-over-effect");
};

//when file drops on the drag area
dropArea.ondrop = (e) => {
  e.preventDefault();
  dropArea.classList.remove("drag-over-effect");
  if (e.dataTransfer.items) {
    [...e.dataTransfer.items].forEach((item) => {
      if (item.kind === "file") {
        const file = item.getAsFile();
        if (typeValidation(file.type)) {
          uploadFile(file);
        }
      }
    });
  } else {
    [...e.dataTransfer.files].forEach((file) => {
      if (typeValidation(file.type)) {
        uploadFile(file);
      }
    });
  }
};

//Check file type
function typeValidation(type) {
  var splitType = type.split("/")[0];
  if (
    type == "application/pdf" ||
    splitType == "image" ||
    splitType == "video"
  ) {
    return true;
  }
}

//upload file function
// function uploadFile(file) {
//   listSection.style.display = "block";
//   var li = document.createElement("li");
//   li.classList.add("in-prog");
//   li.innerHTML = `
//     <div class="col">
//         <img src="icons/${iconSelector(file.type)}" alt="">
//     </div>
//     <div class="col">
//         <div class="file-name">
//             <div class="name">${file.name}</div>
//         </div>
//             <div class="file-size">${(file.size / (1024 * 1024)).toFixed(
//               2
//             )} MB</div>
//         <div class="containers">
//             <div class="file-progress">
//                 <span class="team"></span>
//             </div>
//                 <span class="span-number">0%</span>
//         </div>
//     </div>
//     <div class="close">
//         <svg xmlns="http://www.w3.org/2000/svg" class="cross" viewBox="0 -960 960 960" fill="#e8eaed">
//         <path
//             d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
//         </svg>
//         <svg xmlns="http://www.w3.org/2000/svg" class="tick" viewBox="0 -960 960 960" fill="#e8eaed">
//         <path d="M400-304 240-464l56-56 104 104 264-264 56 56-320 320Z" />
//         </svg>
//     </div>`;
//   listContainer.prepend(li);
//   var http = new XMLHttpRequest();
//   var data = new FormData();
//   data.append("file", file);
//   http.onload = () => {
//     li.classList.add("complete");
//     li.classList.remove("in-prog");
//   };
//   http.upload.onprogress = (e) => {
//     var percent_complete = (e.loaded / e.total) * 100;
//     li.querySelectorAll('.span-number')[0].innerHTML =
//       Math.round(percent_complete) + "%";
//     li.querySelectorAll('.team')[1].style.width = percent_complete + "%";
//   };
//   http.open("POST", "sender.php", true);
//   http.send(data);
//   li.querySelector(".cross").onclick = () => http.abort();
//   http.onabort = () => li.remove();
// }

//find icon for file
function iconSelector(type) {
  var splitType =
    type.split("/")[0] == "application"
      ? type.split("/")[1]
      : type.split("/")[0];
  return splitType + ".png";
}
