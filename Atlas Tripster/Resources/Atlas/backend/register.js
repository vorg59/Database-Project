import express, { json } from 'express';
import { connect, query, close } from 'mssql';

const app = express();

// Configure database connection
const config = {
    user: 'sa',
    password: '1234',
    server: 'DESKTOP-J9DEB11\\SQLEXPRESS',
    database: 'p',
};

// Function to handle database connection
async function connectToDatabase() {
    try {
        await connect(config);
        console.log('Connected to database');
    } catch (err) {
        console.error('Error connecting to database:', err);
    }
}

// Function to handle signup form submission
async function signUp(username, email, password) {
    try {
        // Connect to the database
        await connectToDatabase();

        // Create a new user record
        await query`INSERT INTO Users (Username, Email, Password) VALUES (${username}, ${email}, ${password})`;

        return { success: true, message: "User signed up successfully!" };
    } catch (err) {
        console.error('SQL error:', err);
        return { success: false, message: "Error signing up user. Please try again later." };
    } finally {
        // Close the connection
        await close();
    }
}

// Express route for signup form submission
app.use(json()); // Middleware to parse JSON bodies
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
