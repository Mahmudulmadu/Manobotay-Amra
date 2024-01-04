document.getElementById('paystack-button').addEventListener('click', function(e) {
  e.preventDefault();

  var email = document.getElementById('donation-email').value;
  var amount = document.getElementById('donation-ammount').value * 100; // Paystack amount in kobo

  var handler = PaystackPop.setup({
    key: 'pk_test_ae156000065aa790d14a0a9b2bedb8f8a4b3c26c',
    email: email,
    amount: amount,
    currency: 'NGN',
    ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a unique reference number
    callback: function(response) {
      // Handle success or failure
      if (response.status === 'success') {
        // Redirect to the Google Form upon successful payment
        window.location.href = 'https://forms.gle/tBmWrgdF3Um1vcAm6';
      } else {
        alert('Payment failed! Reason: ' + response.message);
      }
    }
  });

  handler.openIframe();
});


// document.getElementById('paystack-button').addEventListener('click', async function(e) {
//   e.preventDefault();

//   // const email = document.getElementById('donation-email').value;
//   // const amount = document.getElementById('donation-amount').value * 100;

//   try {
//     const response = await fetch('/getPaystackApiKey');
//     const data = await response.json();

//     const apiKey = data.apiKey;
//     const email = document.getElementById('donation-email').value;
//     const amount = document.getElementById('donation-amount').value * 100;

//     var handler = PaystackPop.setup({
//       key: apiKey,
//       email: email,
//       amount: amount,
//       currency: 'NGN',
//       ref: '' + Math.floor((Math.random() * 1000000000) + 1),
//       callback: function(response) {
//         if (response.status === 'success') {
//           window.location.href = 'https://forms.gle/tBmWrgdF3Um1vcAm6';
//         } else {
//           alert('Payment failed! Reason: ' + response.message);
//         }
//       }
//     });

//     handler.openIframe();
//   } catch (error) {
//     console.error('Error:', error);
//   }
// });
