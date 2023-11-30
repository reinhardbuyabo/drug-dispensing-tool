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
  // const tags = drug.tags.split(','); // tags was stored as a string containing tags ...

  const onClick = () => {
    console.log("Button Clicked");
  }

  return (
    <div>
      <div className="max-w-sm rounded overflow-hidden shadow-lg">
        
        <img src="https://deliverypharmacyke.com/wp-content/uploads/2020/10/CALPOL-6-SYRUP-S-F-80ml.jpg" alt="" className="w-full" />

        <div className="px-6 py-4">

          <div className="font-bold text-black-500 text-xl mb-2">
            {drug.name}
          </div>

        </div>


        <ul>
          <li>
            <strong>Category: </strong>
            {drug.category}
          </li>

          {/* <li>
            <strong>: </strong>
            {drug.category}
          </li> */}

          {/* <li>
            <strong>: </strong>
            {drug.name}
          </li> */}
        </ul>

        <button
      className="btn mx-auto mb-2"
      onClick={onClick}
>Purchase</button>
      </div>

      {/* <div className="px-6 py-4">
        {tags.map((tag, index) => (
          <span key={index} className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
          {tag}
        </span>
        ))}
      </div> */}
    </div>
  )
}

export default DrugCard