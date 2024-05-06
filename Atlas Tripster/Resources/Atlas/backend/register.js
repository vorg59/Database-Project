const express = require('express');
const bodyParser = require('body-parser');
const sql = require('mssql');
const path = require('path'); // Import the path module

const app = express();

// Middleware
app.use(bodyParser.urlencoded({ extended: true }));

// Database configuration
const config = {
  user: 'sa',
  password: '1234',
  server: 'localhost\\DESKTOP-J9DEB11\\SQLEXPRESS',
  database: 'p',
  options: {
    encrypt: true // If you're connecting to Azure, you may need encryption
  }
};

// Route to handle signup POST request
app.post('/signup', async (req, res) => {
  const { username, email, password } = req.body;

  try {
    // Connect to the database
    await sql.connect(config);

    // Insert user data into the database
    const result = await sql.query`INSERT INTO Users (username, email, password) VALUES (${username}, ${email}, ${password})`;

    console.log('User added successfully:', result);

    // Send response to client
    res.status(200).send('User added successfully');
  } catch (error) {
    console.error('Error adding user:', error);
    res.status(500).send('Error adding user');
  } finally {
    // Close the database connection
    sql.close();
  }
});

// Start the server
const port = 5500;
app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
