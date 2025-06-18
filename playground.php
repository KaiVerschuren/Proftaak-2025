<?php
include 'inc/php/functions.php';
initSession();

head("Playground");

headerFunc();
?>
<main class="container">
  <h1 class="playgroundTitle">Playground</h1>

  <button onclick="showToast('success', 'this is a success toast');" class="btnPrimary">Toast success</button>
  <button onclick="showToast('error', 'this is an error toast');" class="btnPrimary">Toast error</button>
  <button onclick="showToast('info', 'this is an info toast');" class="btnPrimary">Toast info</button>
  <button onclick="showToast('warning', 'this is a warning toast, this is a warning toast, this is a warning toast');" class="btnPrimary">Toast warning</button>
  <button onclick="blinkLED()" class="btnPrimary">Dispense 11</button>
  <button onclick="blinkLED()" class="btnPrimary">Dispense 24</button>
  <button onclick="blinkLED()" class="btnPrimary">Dispense 54</button>
  <button onclick="blinkLED()" class="btnPrimary">Dispense 14</button>

  <input type="number" id="slotNumber" placeholder="Enter slot number">
  <button onclick="sendSlot()">Send Slot</button>

  <script>
    function sendSlot() {
      const slot = document.getElementById("slotNumber").value;

      fetch('send.php?slot=' + slot)
        .then(response => response.text())
        .then(data => alert(data));
    }
  </script>
  <input type="text" id="productOne" />
  <input type="text" id="productTwo" />
  <input type="text" id="productThree" />
  <button onclick="sendOrder()">Send</button>on>


  <script>
    function sendOrder() {
      alert("sendOrder() was triggered");
      const one = document.getElementById("productOne").value;
      const two = document.getElementById("productTwo").value;
      const three = document.getElementById("productThree").value;

      const query = `send.php?productOne=${one}&productTwo=${two}&productThree=${three}`;

      fetch(query)
        .then(response => response.text())
        .then(data => alert(data));
    }
  </script>
</main>
<?php
footerFunc();
?>