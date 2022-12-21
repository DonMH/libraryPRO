const selectTrend = document.querySelector("#trend");
const selectBest = document.querySelector("#best");
const selectNew = document.querySelector("#new");
const books = document.querySelector("#books-grid");

let activeLink = 0; //trend
const indexes = [selectTrend, selectBest, selectNew];

// const data = {
//   rating: 4,
//   copies: 120,
//   imageUrl: "./images/book1.webp",
//   name: "akmd",
// };

const createBook = (data) => {
  let rating = "";
  for (let index = 0; index < data.rating; index++) {
    rating += '<i class="fa-solid fa-star"></i>';
  }
  return `
  <div class="book">
    <div class="rating">
    <div>
    ${rating}
    </div>
      <span>(${data.copies})</span>
    </div>
      <img class="w-100 my-2 img-thumbnail"  alt="${data.name}" src="${data.imageUrl}">
      <h4 class="text-center m-0">${data.name}</h4>
   </div>
  `;
};

const addActiveClass = (e) => {
  indexes.forEach((index) => {
    index.classList.remove("active");
  });
  const index = e.target.dataset.index;
  activeLink = index;
  indexes[index].classList.add("active");
  // ---------------------------
  const generateBooks = "";
  const end = (index + 1) * 20;
  const start = (index + 1) * 20 - 10;
  books.textContent = "";
  for (let index = end; index > start; index--) {
    const data = {
      rating: index % 5 || 5,
      copies: index,
      imageUrl: `./images/book${index % 11}.webp`,
      name: `كتاب ${index}`,
    };
    books.insertAdjacentHTML("afterbegin", createBook(data));
  }
  // ---------------------------
};

selectTrend.addEventListener("click", addActiveClass);
selectBest.addEventListener("click", addActiveClass);
selectNew.addEventListener("click", addActiveClass);

addActiveClass({
  target: { dataset: { index: 0 } } 
});
