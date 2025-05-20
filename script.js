<script>
  let currentToken = 1; // You can store and load this from localStorage or backend if needed

  document.getElementById("appointmentForm").addEventListener("submit", function(e) {
    e.preventDefault();

    // Format token number like KAMALA0001, KAMALA0002...
    const token = "KAMALA" + String(currentToken).padStart(4, '0');
    currentToken++;

    document.getElementById("tokenNumber").textContent = token;
    document.getElementById("tokenBox").style.display = "block";
  });
</script>


