import React, { useState } from 'react';

const TodoForm = ({ todo = {}, onSubmit }) => {
  const [title, setTitle] = useState(todo.title || '');
  const [description, setDescription] = useState(todo.description || '');
  const [status, setStatus] = useState(todo.status || 'pending');
  const [priority, setPriority] = useState(todo.priority || 'medium');

  const handleSubmit = (e) => {
    e.preventDefault();
    const updatedTodo = { id: todo.id, title, description, status, priority };
    onSubmit(updatedTodo);  // onSubmit fonksiyonunu çağırıyoruz
  };

  return (
    <form onSubmit={handleSubmit} className="todo-form">
      <div className="mb-4">
        <label className="block text-gray-700">Başlık</label>
        <input
          type="text"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
          className="w-full p-2 border border-gray-300 rounded-md"
        />
      </div>

      <div className="mb-4">
        <label className="block text-gray-700">Açıklama</label>
        <textarea
          value={description}
          onChange={(e) => setDescription(e.target.value)}
          className="w-full p-2 border border-gray-300 rounded-md"
        ></textarea>
      </div>

      <div className="mb-4">
        <label className="block text-gray-700">Durum</label>
        <select
          value={status}
          onChange={(e) => setStatus(e.target.value)}
          className="w-full p-2 border border-gray-300 rounded-md"
        >
          <option value="pending">Bekleyen</option>
          <option value="completed">Tamamlanan</option>
        </select>
      </div>

      <div className="mb-4">
        <label className="block text-gray-700">Öncelik</label>
        <select
          value={priority}
          onChange={(e) => setPriority(e.target.value)}
          className="w-full p-2 border border-gray-300 rounded-md"
        >
          <option value="low">Düşük</option>
          <option value="medium">Orta</option>
          <option value="high">Yüksek</option>
        </select>
      </div>

      <button type="submit" className="bg-blue-500 text-white py-2 px-4 rounded-md">
        {todo.id ? 'Güncelle' : 'Ekle'}
      </button>
    </form>
  );
};

export default TodoForm;
