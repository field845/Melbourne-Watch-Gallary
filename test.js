
var total;


function add(ele) {
  const description = ele.parentElement.parentElement.querySelector(".product_name").innerHTML;
  const price ="$"+ele.parentElement.querySelector(".product_price").innerHTML;

  const value = parseInt(ele.parentElement.querySelector(".product_price").innerHTML);
  const imgurl = ele.parentElement.parentElement.querySelector(".product_image").getAttribute("src");


  console.log(description,price, value, imgurl);

  // --------------------------------shopping cart----------------------------------

  let item = {
    item_description: description,
    item_price: price,
    item_value: value,
    item_imgurl: imgurl,
    item_total: total,
  };

  let slist = JSON.parse(localStorage.getItem("shopping_list"));
  if (slist == null) slist = [];
  slist.push(item);
  localStorage.setItem("shopping_list", JSON.stringify(slist));
  displayitems();
}

function displayitems() {
  let slist = JSON.parse(localStorage.getItem("shopping_list"));
  if (slist === null) return;
  let list = "";
  total = 0;
  slist.forEach((item, index) => {
    list += `
               <div class="item_container">
                <img
                 class="item_img image"
                  src="${item.item_imgurl}"
                 />
                 <p class="item_destription page">
                   ${item.item_description}
                 </p>
                 <p class="item_price price">$${item.item_value}</p>
                 <button onclick="remove(${index})"
                  type="button"
                 class="btn btn-outline-success btn-sm remove"
                 >Remove
                 </button>
                </div>
               `;
    total += item.item_value;
  });

  document.getElementById("cart").innerHTML = list;

  document.querySelector(".total_amount span").innerHTML = total;

  document.querySelector(".checkout").innerHTML = `
  <button type="button" class="btn btn-success">
            Check Out<span class="badge bg-secondary">${slist.length}</span>
          </button>
  `;
}

function remove(index) {
  let slist = JSON.parse(localStorage.getItem("shopping_list"));
  slist.splice(index, 1);

  localStorage.setItem("shopping_list", JSON.stringify(slist));
  displayitems();
}

// --------------------------------------swap image-----------------------------------------

function swap(element) {
  document.querySelector("img.largeimage").src = element.src;
}

// -----------------------------------------product page---------------------------------

function additem() {
  const description = document.querySelector(".description h1").textContent;
  const price = document.querySelector(".description h2").textContent;
  let value = parseInt(document.querySelector(".description span").textContent);
  const imgurl = document.querySelector(".largeimage").getAttribute("src");

  let item = {
    item_description: description,
    item_price: price,
    item_value: value,
    item_imgurl: imgurl,
    item_total: total,
  };

  let slist = JSON.parse(localStorage.getItem("shopping_list"));
  if (slist == null) slist = [];
  slist.push(item);
  localStorage.setItem("shopping_list", JSON.stringify(slist));
  displayitems();
}

// ---------------------------------------test--------------------------------------------
//   alert(description);
// alert(price);
//   alert(imgurl);
// alert(value);

//   newFunction();
//   function newFunction() {
//     var obj = class shoppingcart {
//       constructor(description, price, imgurl) {
//         this.description = description;
//         this.price = price;
//         this.imgurl = imgurl;
//       }
//       get description() {
//         return description;
//       }
//       get price() {
//         return price;
//       }
//       get imgurl() {
//         return imgurl;
//       }
//     };
//     console.log(obj.description);
//     console.log(obj.price);
//     console.log(obj.imgurl);
//   }
// }

//   document.getElementById("cart").innerHTML += `
//     <div class="item_container ${index}">
//       <img
//         class="item_img image"
//         src="${imgurl}"
//       />
//       <p class="item_destription page">
//         ${description}
//       </p>
//       <p class="item_price price">${price}</p>
//       <button
//         type="button"
//         class="btn btn-outline-success btn-sm remove"
//       >
//         <p class="item_button" onclick="remove(${index})">Remove</p>
//       </button>
//       </div>
//      `;
//   index++;
// }

// function remove(element) {
//   document.getElementById("index").innerHTML = ` `;
// }
