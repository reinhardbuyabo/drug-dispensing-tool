import React from 'react'
import { Edit, SimpleForm, TextInput, DateInput, DateField } from 'react-admin'

const DrugEdit = (props) => {
  return (
    <Edit>
        <SimpleForm>
            <TextInput disabled source='id' />
            <TextInput source='name' />
            <TextInput source='category' />
            <DateField source='publishedAt' />
        </SimpleForm>
    </Edit>
  )
}

export default DrugEdit