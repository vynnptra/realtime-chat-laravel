const socket = io('http://localhost:6001');
const chatContainer = document.getElementById('chat-messages');

const chatId = chatContainer.dataset.userId;

socket.emit('join-room', `chat.${chatId}`);

socket.on('chat-message', (event) => {
    console.log("Pesan masuk:", event);

    const isOutgoing = Number(event.from) === Number(chatId);
    const messageElement = document.createElement('div');
    messageElement.classList.add('flex', 'mb-4');

    if (isOutgoing) {
        messageElement.classList.add('justify-end');
        messageElement.innerHTML = `
            <div class="flex max-w-96 bg-indigo-500 text-white rounded-lg p-3 gap-3">
                <p>${escapeHtml(event.message)}</p>
            </div>
            <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                <img src="https://placehold.co/200x/b7a8ff/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="My Avatar" class="w-8 h-8 rounded-full">
            </div>
        `;
    } else {
        messageElement.innerHTML = `
            <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                <img src="https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato" alt="User Avatar" class="w-8 h-8 rounded-full">
            </div>
            <div class="flex max-w-96 bg-white rounded-lg p-3 gap-3">
                <p class="text-gray-700">${escapeHtml(event.message)}</p>
            </div>
        `;
    }

    chatContainer.appendChild(messageElement);
    console.log(chatContainer.innerHTML);
    chatContainer.scrollTop = chatContainer.scrollHeight;
});

function escapeHtml(unsafe) {
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}
