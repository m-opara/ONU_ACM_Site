/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function on(url) {
  document.getElementById("overlay").style.backgroundImage = 'url('+url+')';
  document.getElementById("overlay").style.backgroundRepeat = "no-repeat";
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}
