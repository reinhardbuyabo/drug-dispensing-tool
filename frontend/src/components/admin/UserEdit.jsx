import React from 'react'
import { Edit, SimpleForm, TextInput, EmailField } from 'react-admin'

const UserEdit = (props) => {
  return (
    <Edit>
        <SimpleForm>
            <TextInput disabled source='id' />
            <TextInput source='name' />
            <TextInput source='email' />
        </SimpleForm>
    </Edit>
  )
}

export default UserEdit