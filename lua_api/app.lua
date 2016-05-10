local config = require("lapis.config").get()

-- Autoload
package.path = table.concat({
    package.path,
    config.app_directory,
    "/usr/local/share/lua/5.1/lapis/cmd/templates/?.lua",
    "/var/www/serials_loc/serials/lua_api/model/?.lua"
}, ";")

local lapis = require("lapis")
local app = lapis.Application()
local Genre = require("model.genre").Genre
local Tag = require("model.tag").Tag
local Asset = require("model.asset").Asset
--local Images = require("model.images").Images
local response = require("parts.response").response
local helper = require("parts.helper").helper
local db = require("lapis.db")
local cached = require("lapis.cache").cached

-- Genres api endpoints.
app:get("/api/1.0/genres(/:genre_id)", function(self)
    local data
    local limit = config.default_entity_limit
    response.prepareHeaders(self)
    if self.params.genre_id == nil then
        if self.params.limit ~= nil then
            limit = self.params.limit
        end
        data = Genre:select("LIMIT ?", tonumber(limit))
    else
        data = Genre:select("WHERE id = ?", self.params.genre_id)
    end

    return response.success(data)
end)

-- Tags api endpoints.
app:get("/api/1.0/tags(/:tag_id)", function(self)
    local data
    local limit = config.default_entity_limit
    response.prepareHeaders(self)
    if self.params.tag_id == nil then
        if self.params.limit ~= nil then
            limit = self.params.limit
        end
        data = Tag:select("LIMIT ?", tonumber(limit))
    else
        data = Tag:select("WHERE id = ?", self.params.tag_id)
    end

    return response.success(data)
end)

---- Assets api endpoints.
--app:get("/api/1.0/assets(/:id)", function(self)
--  return "Welcome to Lapis " .. require("lapis.version")
--end)

app:match("/api/1.0/assets(/tag(/:tagId))", function(self)
    if self.params.tagId == nil then
        local errors = {"Missed required parameter - tagId"}
        return response.error(422, errors);
    end
    local assets = Asset.getByTag(self.params.tagId, true);

    return response.success(assets)
end)

app:get("/api/1.0/assets(/genre(/:genreId))", function(self)
    if self.params.genreId == nil then
        local errors = {"Missed required parameter - genreId"}
        return response.error(422, errors);
    end
    local assets = Asset.getByGenre(self.params.genreId, true);

    return response.success(assets)
end)

-- Error handler.
app.handle_404 = function(self)
    local errors = {"Failed to find route: " .. self.req.cmd_url}
    return response.error(404, errors);
end

return app
