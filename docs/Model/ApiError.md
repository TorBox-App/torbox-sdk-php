# ApiError

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**success** | **bool** | False when the request failed. A list with nothing to return answers &#x60;ITEM_NOT_FOUND&#x60; with &#x60;success&#x60; true: the request worked, there is no data. |
**error** | **string** | The error code, such as &#x60;BAD_TOKEN&#x60;. Listed in the introduction. |
**detail** | **string** | What went wrong, in words. |
**data** | **mixed** | Extra data for some errors, usually null. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
