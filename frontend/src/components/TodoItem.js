import React from 'react';
import { Link } from 'react-router-dom';
import StatusBadge from './StatusBadge'; // Durum göstergesi
import PriorityIndicator from './PriorityIndicator'; // Öncelik göstergesi

const TodoItem = ({ todo }) => {
  return (
    <li className="todo-item mb-4 p-4 bg-white shadow-md rounded-md">
      <div className="flex justify-between items-center">
        <div>
          <Link to={`/todo/${todo.id}`} className="text-xl font-bold text-blue-600">
            {todo.title}
          </Link>
          <p className="text-gray-500">{todo.description}</p>
        </div>
        <div className="flex items-center">
          <StatusBadge status={todo.status} />
          <PriorityIndicator priority={todo.priority} />
        </div>
      </div>
    </li>
  );
};

export default TodoItem;
