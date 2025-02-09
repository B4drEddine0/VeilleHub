function showMessage(type, message, callback = null) {
    const messageDiv = document.createElement('div');
    messageDiv.className = `fixed top-4 right-4 p-4 rounded-lg ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } text-white`;
    messageDiv.textContent = message;
    document.body.appendChild(messageDiv);

    // Wait for the message to be displayed before executing the callback
    setTimeout(() => {
        messageDiv.remove();
        if (callback) callback(); // Execute callback (like redirect) after message is shown
    }, 3000);
}

