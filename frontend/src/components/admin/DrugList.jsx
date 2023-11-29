import React from 'react'
import { List, Datagrid, TextField, DateField, EditButton, DeleteButton } from 'react-admin'

const DrugList = (props) => {
  return <List {...props}>
    <Datagrid>
    <TextField source='id' />
    <TextField source='name' />
    <TextField source='category' />
    <DateField source='publishedAt' />
    <EditButton basePath='/drugs' />
    <DeleteButton basePath='/drugs' />
    </Datagrid>
  </List>
}

export default DrugList