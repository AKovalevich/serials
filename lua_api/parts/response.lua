local config = require("lapis.config").get()
local helper = require("parts.helper").helper
local response = {}

response.success = function(data, status)
    if status == nil then
        status = 200;
    end

    if data == nil then
        data = {};
    end

    return { json = { status = status, data = {count = helper.arrayCount(data), items = data} } }
end

response.error = function(status, messages)
    return { json = { status = status, errors = messages } }
end

response.prepareHeaders = function(self)
    if config.cors_headers == "on" then
        self.res.headers["Access-Control-Allow-Origin"] = "*"
    end
end

return {
    response = response
}
