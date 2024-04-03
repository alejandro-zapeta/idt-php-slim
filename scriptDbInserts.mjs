import pkg from 'pg';
const { Client } = pkg;
import fs from "fs"
import { readFile } from 'fs/promises';
const states = JSON.parse(await readFile(new URL('./USA-states.json', import.meta.url)));

const client = new Client({
  host: '95.111.230.5',
  port: 5432,
  database: 'postgres',
  user: 'postgres',
  password: 'Manzana9090',
})

   await client.connect()
   const insertSqlState = 'INSERT INTO state(idState, state, population, counties) VALUES ($1, $2, $3, $4)'
   const insertSqlCounty = 'INSERT INTO country(idCountry, county, population, idState) VALUES ($1, $2, $3, $4)'

try {
  await client.query('BEGIN')
  let idCountry = 1;
  for (var i = states.length - 1; i >= 0; i--) {
		const state =	states[i];
		let idState = i + 1;
		 const valsInsert = [idState, state.state, state.population, state.counties]
		 await client.query(insertSqlState, valsInsert)
		 var stateCountries = JSON.parse(fs.readFileSync(state.state + ".json", 'utf8'));

	  for (var j = stateCountries.length - 1; j >= 0;j--) {
	 	 const country = stateCountries[j]
	  	 const valsInsert2 = [idCountry, country.county, country.population, idState]
	  	  await client.query(insertSqlCounty, valsInsert2)
	  	  idCountry = idCountry + 1;
	  }
  }
  await client.query('COMMIT')
} catch (e) {
  await client.query('ROLLBACK')
  throw e
} finally {
  client.release()
}