import React, { useState } from 'react'

const DrugSearch = ( { searchText } ) => {
    const [text, setText] = useState('');

    const onSubmit = (e) => {
        e.preventDefault();

        searchText(text);
    }

  return (
    <div className="max-w-sm rounded overflow-hidden my-10 mx-auto">
        <form onSubmit={onSubmit} className="w-full max-w-sm">
            <div className="flex items-center border-b border-b-2 border-teal-500 py-2">
                <input onChange={e => setText(e.target.value)} placeholder="Search Drug Term..." type="text" className="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" />
                <button className="btn" type='submit'>
                    Search
                </button>
            </div>
        </form>
    </div>
  )
}

export default DrugSearch