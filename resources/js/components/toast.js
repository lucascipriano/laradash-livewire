export default function toast() {
    return {
        init() {
            window.addEventListener('toastify', (event) => {
                const data = event.detail || {};

                Toastify({
                    text: data.message || data.msg || 'Mensagem padrão',
                    duration: data.duration || 3000,
                    gravity: data.gravity || 'top',
                    position: data.position || 'right',
                    style: {
                        background: data.backgroundColor || '#4f46e5',
                    }
                }).showToast();
            });
        }
    }
}
