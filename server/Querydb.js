const { db } = require('./Database')

const setStatus = (device, status) => {
    try {
        db.query(`UPDATE numbers SET status = '${status}' WHERE body = ${device} `)
        return true;
    } catch (error) {
        return false
    }
}

function dbQuery(query) {
    return new Promise(data => {
        db.query(query, (err, res) => {
            if (err) throw err;
            try {
                data(res);
            } catch (error) {
                data({});
                //throw error;
            }
        })
    })
}

const validateKey = async (key, device) => {

    const data = await dbQuery(`SELECT * FROM users JOIN numbers ON users.id = numbers.user_id WHERE body = '${device}' `);
    console.log(data[0].api_key)
    console.log(key)
    if (data.length === 0) return false;
    return data[0]
}


module.exports = { setStatus, validateKey, dbQuery }