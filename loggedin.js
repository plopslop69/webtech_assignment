alert("Login Successful");

// const phpecho = "<?php echo $row['id']; ?>";
// console.log(phpecho);

console.log(username);

const login = document.getElementById("login");
login.remove();

const home = document.getElementById("home");

let message = `Welcome ${username}`;

const h2elem = document.createElement("h2");
h2elem.style.color = "#353535";
h2elem.style.marginTop = "50px";
h2elem.style.fontSize = "50px";
h2elem.style.textDecoration = "none";
h2elem.innerHTML = message;
home.appendChild(h2elem);
