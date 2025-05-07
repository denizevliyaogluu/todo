import React from 'react';

const PriorityIndicator = ({ priority }) => {
  let priorityClass = '';
  if (priority === 'high') {
    priorityClass = 'bg-red-500';
  } else if (priority === 'medium') {
    priorityClass = 'bg-orange-500';
  } else {
    priorityClass = 'bg-green-500';
  }

  return (
    <span className={`text-white py-1 px-3 rounded-md ${priorityClass}`}>
      {priority.charAt(0).toUpperCase() + priority.slice(1)}
    </span>
  );
};

export default PriorityIndicator;
