import React from 'react';

/**
 * Drug is an object which has the following properties:
 * 1. user ... drug name
 * 2. webformatURL ... imgUrl
 * 3. views ... price
 * 4. downloads ... purchases
 * 5. like ... 
 * 6. tags ... route of administration
 */

const DrugCard = ({ drug }) => {
  const tags = drug.tags.split(','); // tags was stored as a string containing tags ...

  return (
    <div>
      <div className="max-w-sm rounded overflow-hidden shadow-lg">
        
        <img src={drug.webformatURL} alt="" className="w-full" />

        <div className="px-6 py-4">

          <div className="font-bold text-purple-500 text-xl mb-2">
            Photo by {drug.user}
          </div>

        </div>


        <ul>
          <li>
            <strong>Views: </strong>
            {drug.views}
          </li>

          <li>
            <strong>Downloads: </strong>
            {drug.downloads}
          </li>

          <li>
            <strong>Likes: </strong>
            {drug.likes}
          </li>
        </ul>
      </div>

      <div className="px-6 py-4">
        {tags.map((tag, index) => (
          <span key={index} className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
          {tag}
        </span>
        ))}
      </div>
    </div>
  )
}

export default DrugCard