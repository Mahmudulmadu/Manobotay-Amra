const express = require('express');
const app = express();
const dotenv = require('dotenv');

dotenv.config(); // Load environment variables from .env file

app.use(express.static('public')); // Serve static files from the "public" directory

app.get('/getPaystackApiKey', (req, res) => {
  res.json({ apiKey: process.env.PAYSTACK_API_KEY });
});

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
