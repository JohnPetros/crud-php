const modal = document.querySelector(".modal");
const closeButton = document.querySelector(".modal .close");
const fade = document.querySelector(".fade");
const updateButtons = document.querySelectorAll(".button.update");
const deleteButton = document.querySelectorAll(".button.delete");

const toggleModal = () => {
  [modal, fade].forEach((element) => element.classList.toggle("hidden"));
};

const insertIntoModal = (data) => {
  for (const [key, value] of Object.entries(data)) {
    const input = modal.querySelector(`input[name='update-${key}']`);
    input.value = value;
  }
  toggleModal();
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
  if (!confirm("Deseja mesmo apagar esse registro?")) event.preventDefault();
};

const verifyIfHasUsers = () => {
  const container = document.querySelector(".container");
  const thead = document.querySelector("thead");
  const areThereUsers = container.querySelector(".empty");

  console.log(areThereUsers);
  if (areThereUsers) {
    thead.classList.add("hidden");
  } else {
    thead.classList.remove("hidden");
  }
};

updateButtons.forEach((button) =>
  button.addEventListener("click", getUserData)
);

[closeButton, fade].forEach((element) =>
  element.addEventListener("click", toggleModal)
);

deleteButton.forEach((button) =>
  button.addEventListener("click", handleDelete)
);

window.addEventListener('load', verifyIfHasUsers)
