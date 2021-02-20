const headers = {
  "Access-Control-Allow-Origin": "*",
  "Access-Control-Allow-Headers": "Content-Type",
  "Access-Control-Allow-Methods": "OPTIONS,POST,GET",
}

exports.handler = async (event, context) => {

  const { email, listId } = JSON.parse(event.body)

  if (!email || !listId) {
    return {
      statusCode: 400,
      headers,
      body: JSON.stringify({
        status: 'error',
        error: 'Missing data: email and listId are required',
      })
    }
  }

  if (email === 'success@email.com') {
    return {
      statusCode: 200,
      headers,
      body: JSON.stringify({
        status: 'pending',
      })
    }
  } else if (email === 'alreadysubscribed@email.com') {
    return {
      statusCode: 200,
      headers,
      body: JSON.stringify({
        status: 'subscribed',
      })
    }
  } else {
    return {
      statusCode: 400,
      headers,
      body: JSON.stringify({
        status: 'error',
        error: 'Mixed',
      })
    }
  }
}
