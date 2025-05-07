import React, { useState } from 'react';

const TodoFilter = () => {
  const [filterText, setFilterText] = useState('');
  const [filterStatus, setFilterStatus] = useState('');
  const [filterPriority, setFilterPriority] = useState('');

  const handleFilterChange = () => {
    // Filtreleme işlemi burada yapılacak
  };

  return (
    <div className="todo-filter mb-6">
      <input
        type="text"
        placeholder="Arama..."
        value={filterText}
        onChange={(e) => setFilterText(e.target.value)}
        className="p-2 border border-gray-300 rounded-md"
      />
      
      <select
        value={filterStatus}
        onChange={(e) => setFilterStatus(e.target.value)}
        className="p-2 border border-gray-300 rounded-md ml-4"
      >
        <option value="">Tüm Durumlar</option>
        <option value="pending">Bekleyen</option>
        <option value="completed">Tamamlanan</option>
      </select>

      <select
        value={filterPriority}
        onChange={(e) => setFilterPriority(e.target.value)}
        className="p-2 border border-gray-300 rounded-md ml-4"
      >
        <option value="">Tüm Öncelikler</option>
        <option value="low">Düşük</option>
        <option value="medium">Orta</option>
        <option value="high">Yüksek</option>
      </select>

      <button
        onClick={handleFilterChange}
        className="bg-blue-500 text-white py-2 px-4 rounded-md ml-4"
      >
        Filtrele
      </button>
    </div>
  );
};

export default TodoFilter;
