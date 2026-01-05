import Sortable from 'sortablejs';

document.addEventListener('DOMContentLoaded', () => {

    /* =========================
       ドラッグ並び替え（枠またぎ対応）
    ========================= */
    document.querySelectorAll('.todo-group').forEach(group => {
        Sortable.create(group, {
    group: {
        name: 'todos',
        pull: true,
        put: true
    },
            animation: 150,

            handle: '.drag-handle',

            draggable: '.todo-item',

            onEnd: function (evt) {
                const newPriority = evt.to.dataset.priority;

                const order = [];
                evt.to.querySelectorAll('.todo-item').forEach((item, index) => {
                    order.push({
                        id: item.dataset.id,
                        order: index,
                        priority: newPriority
                    });
                });

                fetch('/todos/reorder', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ order })
                });

                // 見た目の色を即変更
                evt.item.dataset.priority = newPriority;
                updateColor(evt.item, newPriority);
            }
        });
    });

    function updateColor(item, priority) {
    const title = item.querySelector('.todo-title');
    if (!title) return;

    title.classList.remove('text-red-600', 'text-yellow-600', 'text-blue-600');

    if (priority === '高') title.classList.add('text-red-600');
    if (priority === '中') title.classList.add('text-yellow-600');
    if (priority === '低') title.classList.add('text-blue-600');
}


    /* =========================
       完了チェック
    ========================= */
    document.querySelectorAll('.todo-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const todoId = this.dataset.id;
        const item = this.closest('.todo-item');
        const title = item.querySelector('.todo-title');

        fetch(`/todos/${todoId}`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                completed: this.checked
            })
        }).then(() => {
            // ★ 見た目を即反映
            if (this.checked) {
                title.classList.add('line-through', 'text-gray-400');
            } else {
                title.classList.remove('line-through', 'text-gray-400');
            }
        }).catch(() => {
            alert('更新に失敗しました');
            this.checked = !this.checked;
        });
    });
});


    /* =========================
       優先度変更（手動変更用）
    ========================= */
    document.querySelectorAll('.priority-select').forEach(select => {
        select.addEventListener('change', function () {
            const todoId = this.dataset.id;

            fetch(`/todos/${todoId}/priority`, {
                method: 'PATCH',
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    priority: this.value
                })
            }).catch(() => {
                alert('優先度の更新に失敗しました');
            });
        });
    });

});
