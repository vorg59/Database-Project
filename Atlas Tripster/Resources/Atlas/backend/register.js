const express = require('express');
const sql = require('mssql');

const app = express();

// Configure database connection
const config = {
    user: 'sa',
    password: '1234',
    server: 'localhost:/sqlexpress',
    database: 'p',
};

// Function to handle signup form submission
async function signUp(username, email, password) {
    try {
        // Connect to the database
        await sql.connect(config);

        // Create a new user record
        await sql.query`INSERT INTO Users (Username, Email, Password) VALUES (${username}, ${email}, ${password})`;

        // Close the connection
        await sql.close();

        return { success: true, message: "User signed up successfully!" };
    } catch (err) {
        console.error('SQL error:', err);
        return { success: false, message: "Error signing up user. Please try again later." };
    }
}

// Express route for signup form submission
app.use(express.json()); // Middleware to parse JSON bodies
app.post('/signup', async (req, res) => {
    const { username, email, password } = req.body;

    // Call the signup function
    const result = await signUp(username, email, password);

    // Send response back to client
    res.json(result);
});

// Start the server
const port = process.env.PORT || 5501;
app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
