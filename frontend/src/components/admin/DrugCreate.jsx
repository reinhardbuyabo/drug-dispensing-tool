import React from 'react'
import { Create, SimpleForm, TextInput, DateInput } from 'react-admin'

const DrugCreate = (props) => {
  return (
    <Create title='Create a drug' {...props}>
        <SimpleForm>
            <TextInput source='name' />
            <TextInput source='category' />
            <DateInput label='Published' source='publishedAt'/>
        </SimpleForm>
    </Create>
  )
}

export default DrugCreate
