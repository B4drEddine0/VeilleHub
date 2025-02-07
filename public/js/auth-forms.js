

    function showMessage(type, message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `fixed top-4 right-4 p-4 rounded-lg ${
            type === 'success' ? 'bg-green-500' : 'bg-red-500'
        } text-white`;
        messageDiv.textContent = message;
        document.body.appendChild(messageDiv);
   
        setTimeout(() => {
            messageDiv.remove();
        }, 3000);
    }

