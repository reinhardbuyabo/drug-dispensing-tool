import React from 'react'
import { Create, SimpleForm, TextInput, DateInput } from 'react-admin'

const UserCreate = (props) => {
  return (
    <Create title='Create a users' {...props}>
        <SimpleForm>
            <TextInput source='name' />
            <TextInput source='email' />
        </SimpleForm>
    </Create>
  )
}

export default UserCreate