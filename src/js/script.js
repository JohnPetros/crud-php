const updateModal = document.querySelector(".update-modal");
const closeButtons = document.querySelectorAll(".close");
const fade = document.querySelector(".fade");
const updateButtons = document.querySelectorAll(".button.update");
const deleteButtons = document.querySelectorAll(".button.delete");
const deleteModal = document.querySelector(".delete-modal");

const openElement = (elementName) => {
  const element = elementName === "update-modal" ? updateModal : deleteModal;
  [element, fade].forEach((element) => element.classList.remove("hidden"));
};

const closeAllElements = () => {
  [updateModal, deleteModal, fade].forEach((element) =>
    element.classList.add("hidden")
  );
};

const insertIntoModal = (data) => {
  for (const [key, value] of Object.entries(data)) {
    const input = updateModal.querySelector(`input[name='update-${key}']`);
    input.value = value;
  }
  openElement("update-modal");
};

const getUserData = (event) => {
  const id = event.target.id;
  const row = event.target.parentNode.parentNode;
  const name = row.querySelector(".name").textContent;
  const email = row.querySelector(".email").textContent;
  const phone = row.querySelector(".phone").textContent;
  const data = {
    id: id,
    name: name,
    email: email,
    phone: phone,
  };
  console.log(data);
  insertIntoModal(data);
};

const handleDelete = (event) => {
  const id = event.target.id;
  const confirmDeleteButton = deleteModal.querySelector(".delete");
  openElement("delete-modal");

  confirmDeleteButton.addEventListener(
    "click",
    () => (location.href = "./src/actions/delete.php?id=" + id)
  );
};

const verifyIfHasUsers = () => {
  const container = document.querySelector(".container");
  const thead = document.querySelector("thead");
  const areThereUsers = container.querySelector(".empty");
  areThereUsers
    ? thead.classList.add("hidden")
    : thead.classList.remove("hidden");
};

updateButtons.forEach((button) =>
  button.addEventListener("click", getUserData)
);

[...closeButtons, fade].forEach((element) =>
  element.addEventListener("click", closeAllElements)
);

deleteButtons.forEach((button) =>
  button.addEventListener("click", handleDelete)
);

window.addEventListener("load", verifyIfHasUsers);
