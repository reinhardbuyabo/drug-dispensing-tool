// Install react-admin
import React from 'react'
import DrugCreate from './admin/DrugCreate'
import DrugEdit from './admin/DrugEdit'
import DrugList from './admin/DrugList'
import UserCreate from './admin/UserCreate'
import UserEdit from './admin/UserEdit'
import UserList from './admin/UserList'

function AdminPanel() {
  return (
    (
        <Admin dataProvider={jsonServerProvider('http://localhost:5000')}> 
    
          <Resource name='drugs' list={DrugList} create={DrugCreate} edit={DrugEdit}/>
          <Resource name='users' list={UserList} create={UserCreate} edit={UserEdit}/>
        </Admin>
      )
  )
}

export default AdminPanel