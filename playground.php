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
<input type="number" id="slot1" placeholder="Slot 1"><br><br>
  <input type="number" id="slot2" placeholder="Slot 2"><br><br>
  <input type="number" id="slot3" placeholder="Slot 3"><br><br>

  <button onclick="sendSlots()">Send</button>

  <script>
    function sendSlots() {
      const slot1 = document.getElementById("slot1").value;
      const slot2 = document.getElementById("slot2").value;
      const slot3 = document.getElementById("slot3").value;

      fetch(`send.php?slot1=${slot1}&slot2=${slot2}&slot3=${slot3}`)
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => alert("Error: " + error));
    }
  </script>
</main>
<?php
footerFunc();
?>